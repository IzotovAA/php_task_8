<?php

class Solution1
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
            if ($height[$left] > $height[$right]) {
                $tempArea = ($right - $left) * $height[$right];
                $tempArea > $maxArea ? $maxArea = $tempArea : $maxArea;
                $right--;
            } elseif ($height[$left] < $height[$right]) {
                $tempArea = ($right - $left) * $height[$left];
                $tempArea > $maxArea ? $maxArea = $tempArea : $maxArea;
                $left++;
            } else {
                $tempArea = ($right - $left) * $height[$left];
                $tempArea > $maxArea ? $maxArea = $tempArea : $maxArea;
                $left++;
                $right--;
            }
        }

        return $maxArea;
    }
}

class Solution2
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
            if ($height[$left] > $height[$right]) {
                $tempArea = ($right - $left) * $height[$right];

                if ($tempArea > $maxArea) {
                    $maxArea = $tempArea;
                }

                $right--;
            } elseif ($height[$left] < $height[$right]) {
                $tempArea = ($right - $left) * $height[$left];

                if ($tempArea > $maxArea) {
                    $maxArea = $tempArea;
                }

                $left++;
            } else {
                $tempArea = ($right - $left) * $height[$left];

                if ($tempArea > $maxArea) {
                    $maxArea = $tempArea;
                }

                $left++;
                $right--;
            }
        }

        return $maxArea;
    }
}