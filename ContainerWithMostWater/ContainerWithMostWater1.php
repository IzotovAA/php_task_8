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