<?php

class Solution
{
    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    public function searchMatrix(array $matrix, int $target): bool
    {
        $result = false;
        $rowSearchResult = $this->rowSearch($matrix, $target);
        $rowIndex = $rowSearchResult[0];

        if ($rowIndex > -1) {
            if ($rowSearchResult[1] === 'equal') {
                return true;
            } else {
                $result = $this->itemSearch($matrix[$rowIndex], $target);
            }
        }

        return $result > -1;
    }

    private function itemSearch(array $array, int $target): int
    {
        $result = -1;
        $left = 0;
        $right = array_key_last($array);
        $middle = (int) floor(($right + $left) / 2);

        while ($left < $right) {
            if ($array[$middle] === $target) {
                return $middle;
            } elseif ($middle === $left || $middle === $right) {
                return -1;
            } elseif ($array[$middle] < $target) {
                $left = $middle;
                $middle = (int) ceil(($right + $left) / 2);
            } elseif ($array[$middle] > $target) {
                $right = $middle;
                $middle = (int) floor(($right + $left) / 2);
            }
        }

        return $result;
    }

    private function rowSearch (array $array, int $target): array
    {
        $left = 0;
        $right = array_key_last($array);
        $rowLast = array_key_last($array[0]);

        if ($right < 2) {
            foreach ($array as $key => $row) {
                if ($row[0] === $target || $row[$rowLast] === $target) {
                    return [$key, 'equal'];
                } elseif ($row[0] < $target && $row[$rowLast] > $target) {
                    return [$key, 'maybe inside'];
                }
            }

            return [-1, 'none'];
        }

        $middle = (int) floor(($right + $left) / 2);

        while ($left < $right) {
            if ($array[$middle][0] === $target || $array[$middle][$rowLast] === $target) {
                return [$middle, 'equal'];
            } elseif ($middle === $right || $middle === $left) {
                if ($array[$middle][0] < $target && $array[$middle][$rowLast] >= $target) {
                    if ($array[$middle][$rowLast] === $target) {
                        return [$middle, 'equal'];
                    }
                    return [$middle, 'maybe inside'];
                }
                return [-1, 'none'];
            } elseif ($array[$middle][0] < $target && $array[$middle][$rowLast] >= $target) {
                if ($array[$middle][$rowLast] === $target) {
                    return [$middle, 'equal'];
                }
                return [$middle, 'maybe inside'];
            } elseif ($array[$middle][0] < $target) {
                $left = $middle;
                $middle = (int) ceil(($right + $left) / 2);
            } elseif ($array[$middle][0] > $target) {
                $right = $middle;
                $middle = (int) floor(($right + $left) / 2);
            }
        }

        return [-1, 'none'];
    }
}