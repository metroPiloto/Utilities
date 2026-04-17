<?php
	namespace SortUtilities;
	
	class SortClass {
			/**
	 * Move an item within an array from one position to another.
	 *
	 * Positions are 1-based (the first item is position 1).
	 *
	 * @param array $original_list The list to reorder (array of anything).
	 * @param int   $old_position  The current 1-based position of the item to move.
	 * @param int   $new_position  The desired 1-based position for that item.
	 * @return array The reordered list.
	 */
	public function reorder_object(array $object_array, int $from_position, int $to_position): array {
		// Arrays to hold items
		$top_of_list = [];
		$middle_of_list = [];
		$bottom_of_list = [];
		$new_list = [];

		if ($from_position < $to_position) {
			for ($i = 0; $i <= count($object_array) - 1; $i++) {
				if ($i < $from_position - 1) {
					array_push($top_of_list, $object_array[$i]);
				} elseif ($i > $from_position - 1 && $i <= $to_position - 1) {
					array_push($top_of_list, $object_array[$i]);
				} elseif ($i == $from_position - 1)  {
					array_push($middle_of_list, $object_array[$i]);
				} elseif ($i > $to_position - 1) {
					array_push($bottom_of_list, $object_array[$i]);
				} else {
					// Nothing to see here
				}
			}
		} elseif ($from_position > $to_position) {
			for ($i = 0; $i <= count($object_array) - 1; $i++) {
				if ($i < $to_position - 1) {
					array_push($top_of_list, $object_array[$i]);
				} elseif ($i >= $to_position - 1 && $i < $from_position - 1) {
					array_push($bottom_of_list, $object_array[$i]);
				} elseif ($i == $from_position - 1) {
					array_push($middle_of_list, $object_array[$i]);
				} elseif ($i > $from_position - 1) {
					array_push($bottom_of_list, $object_array[$i]);
				} else {
					// Nothing to see here
				}
			}
		} else {
			// old_position == new_position: nothing to move, return as-is
			return $object_array;
		}

		foreach ($top_of_list AS $item) {
			array_push($new_list, $item);
		}
		foreach ($middle_of_list AS $item) {
			array_push($new_list, $item);
		}
		foreach ($bottom_of_list AS $item) {
			array_push($new_list, $item);
		}

		return $new_list;
	}
	}
?>
