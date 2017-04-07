<?php

namespace shgysk8zer0\Schema\Traits;

trait SQL
{
	protected static $_stms = [];

	public function save(\PDO &$pdo, Int &$main_id = null): Int
	{
		$in_transaction = $pdo->inTransaction();
		if (! $in_transaction) {
			$pdo->beginTransaction();
		}

		try {
			$stm = $this->_getInsertStm($pdo, self::ITEMPROPS);
			if ($parent = get_parent_class(__CLASS__) and method_exists($parent, __FUNCTION__)) {
				$parent_id = parent::save($pdo, $main_id);
				if (is_null($main_id)) {
					$main_id = $parent_id;
					$stm->bindParam(':id', $main_id);
				}
			} elseif (is_int($main_id)) {
				$this->bindParam(':id', $main_id);
			}
			$str = '[]';
			$null = null;
			if (! defined(__CLASS__ . '::ITEMPROPS')) {
				throw new \Exception(sprintf('%s::ITEMPROPS is not defined', __CLASS__));
			} elseif (! defined(__CLASS__ . '::ITEMTYPE')) {
				throw new \Exception(sprintf('%s does not define an ITEMTYPE', __CLASS__));
			}

			if (defined(__CLASS__ . '::ITEMTYPE') and array_key_exists(self::ITEMTYPE, $this->_data)) {
				foreach (self::ITEMPROPS as $itemprop) {
					if (array_key_exists($itemprop, $this->_data[self::ITEMTYPE])) {
						$value = $this->_data[self::ITEMTYPE][$itemprop];
						if (in_array(gettype($value), ['string', 'float', 'integer', 'boolean'])) {
							$stm->bindParam(":{$itemprop}", $this->_data[self::ITEMTYPE][$itemprop]);
						} elseif ($value instanceof \shgysk8zer0\Schema\Thing) {
							$id = $value->save($pdo);
							$stm->bindParam(":{$itemprop}", $id);
						} else {
							$stm->bindParam(":{$itemprop}", $str);
						}
					} else {
						$stm->bindParam(":{$itemprop}", $null);
					}
				}
				$stm->execute();
			}
			$id = $main_id ?? $pdo->lastInsertId();
		} catch (\Throwable $e) {
			exit($e->getMessage());
		}

		if (! $in_transaction) {
			$pdo->commit();
		}
		return $id;
	}

	private function _getInsertStm(\PDO $pdo, Array $keys): \PDOStatement
	{
		if (! array_key_exists(self::ITEMTYPE, static::$_stms)) {
			$sql = $this->_getInsertSQL($keys);
			// $sql = $this->_getInsertSQL();
			// if (method_exists(get_parent_class(), 'save')) {
			// 	$sql .= parent::save($pdo);
			// }
			// foreach ($this->getArrayCopy() as $key => $value) {
			// 	if ($value instanceof \shgysk8zer0\Schema\Thing) {
			// 		$sql .= $value->save($pdo);
			// 	}
			// }
			static::$_stms[self::ITEMTYPE] = $pdo->prepare($sql);
		}
		return static::$_stms[self::ITEMTYPE];
	}

	private function _getSelectSQL(Int $id = 0): String
	{
		$keys = $this->_getKeys();
		$cols = array_map([$this, '_mapCols'], $keys);

		$sql = sprintf(
			"SELECT\n\t%s\nFROM `%s`\nWHERE `id` = %d;\n",
			join(",\n\t", $cols),
			self::ITEMTYPE,
			$id
		);

		return $sql;
	}

	private function _getInsertSQL(Array $keys): String
	{
		$bindings = array_map([$this, '_mapBindingCols'], $keys);
		$cols = array_map([$this, '_mapCols'], $keys);

		$sql = sprintf(
			"INSERT INTO `%s` (\n\t%s\n) VALUES (\n\t%s\n) %s\n",
			self::ITEMTYPE,
			join(",\n\t", $cols),
			join(",\n\t", $bindings),
			$this->_getDuplicateKeyUpdate($bindings, $cols)
		);

		return $sql;
	}

	private function _getKeys(): Array
	{
		return self::ITEMPROPS;
	}

	private function _reduceKeys(Array $keys, String $key): Array
	{
		return array_merge($keys, array_keys($this->_data[$key]));
	}

	private function _mapBindingCols(String $col): String
	{
		return ":{$col}";
	}

	private function _mapCols(String $col): String
	{
		return "`{$col}`";
	}

	private function _hasOwnKey(String $key): Bool
	{
		return in_array($key, self::ITEMPROPS);
	}

	private function _getDuplicateKeyUpdate(Array $bindings, Array $cols): String
	{
		$sql = 'ON DUPLICATE KEY UPDATE';
		$length = count($bindings);
		$n = 0;
		$sets = [];

		for ($n = 0; $n < $length; $n++) {
			$sets[] = "\n\t{$cols[$n]} = COALESCE({$bindings[$n]}, {$cols[$n]})";
		}

		return $sql . join(',', $sets) . ';';
	}
}
