<?php

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    public function threeSum(array $nums): array
    {
        $result = [];
        $last = array_key_last($nums);
        sort($nums);

        for ($i = 0; $i < $last - 1; $i++) {
            if ($i > 0 && $nums[$i] === $nums[$i - 1]) {
                continue;
            }

            $left = $i + 1;
            $right = $last;

            while ($left < $right) {
                $sum = $nums[$i] + $nums[$left] + $nums[$right];

                if ($sum === 0) {
                    $result[] = [$nums[$i], $nums[$left], $nums[$right]];

                    while ($left < $right && $nums[$left] === $nums[$left + 1]) {
                        $left++;
                    }

                    while ($left < $right && $nums[$right] === $nums[$right - 1]) {
                        $right--;
                    }

                    $left++;
                    $right--;
                } elseif ($sum < 0) {
                    $left++;
                } else {
                    $right--;
                }
            }
        }

        return $result;
    }
}