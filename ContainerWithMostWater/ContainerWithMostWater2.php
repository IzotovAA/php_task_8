<?php

class Solution
{
    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea(array $height): int
    {
        $maxArea = 0;
        $left = 0;
        $right = array_key_last($height);

        while ($left < $right) {
            if ($height[$left] >= $height[$right]) {
                $tempArea = ($right - $left) * $height[$right];

                if ($tempArea > $maxArea) {
                    $maxArea = $tempArea;
                }

                $right--;
            } else {
                $tempArea = ($right - $left) * $height[$left];

                if ($tempArea > $maxArea) {
                    $maxArea = $tempArea;
                }

                $left++;
            }
        }

        return $maxArea;
    }
}