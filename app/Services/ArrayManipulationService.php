<?php
namespace App\Services ;

class ArrayManipulationService {

    // Rename Keys in an Associative Array
    public function renameKeys(array $array, string $oldKey, string $newKey): array
    {
        $finalArray = [];

        foreach($array as $key => $value ){
            if($key === $oldKey){
                $finalArray[$newKey] = $value;
            }else{
                $finalArray[$key] = $value;
            }
        }

        return $finalArray;
    }

    // Swap Keys and Values in an Associative Array
    public function swapKeysAndValues(array $array): array
    {
        $swapped = [];

        foreach($array as $key => $value)
        {
            $swapped[$value] =  $key ;
        }

        return $swapped ;
    }

    // Remove Specific Keys from an Associative Array
    public function removeKeys(array $array, array $keysToRemove): array
    {
        foreach ($keysToRemove as $key) {
            if(isset($array[$key])){
                unset($array[$key]);
            }
        }

        return $array ;
    }

    // Change Key Case (Uppercase/Lowercase) in an Associative Array
    public function changeKeyCase(array $array, int $case = CASE_LOWER): array
    {
        $convertedArray = [];

        foreach ($array as $key => $value) {
            if($case == 0){ // => case lower
                $changedKey = strtolower($key);
            }else if($case == 1){
                $changedKey = strtoupper($key);
            }
            $convertedArray[$changedKey] = $value;
        }

        return $convertedArray ;
    }

    // Sort Associative Array by Keys
    public function sortByKeys(array $array, bool $descending = false): array
    {
        if($descending){
            krsort($array);
        }else{
            ksort($array);
        }

        return $array ;
    }

    // Merge Two Associative Arrays by Overwriting Keys
    public function mergeArrays(array $array1, array $array2): array
    {
        foreach ($array2 as $key => $value) {
            $array1[$key] = $value ;
        }

        return $array1 ;
    }

    // Find Missing Keys in an Associative Array
    public function findMissingKeys(array $array, array $requiredKeys): array
    {
        $missingKeys = [];

        foreach($requiredKeys as $key){

            if(!isset($array[$key])){
                $missingKeys[] = $key ;
            }

        }

        return $missingKeys;
    }

    // Reorder Associative Array Keys
    public function reorderKeys(array $array, array $keyOrder): array
    {
        $orderd = [];

        foreach($keyOrder as $key){
            if(isset($array[$key])){
                $orderd[$key] = $array[$key];
            }
        }

        return $orderd ;
    }

    // Replace Specific Keys with New Keys
    public function replaceKeys(array $array, array $keyMapping): array
    {
        $newArray = [];

        foreach($array as $key => $value){

            if(isset($keyMapping[$key])){
                $newArray[$keyMapping[$key]] = $value;
            }else{
                $newArray[$key] = $value;
            }

        }

        return $newArray;
    }

    // Group Associative Array by Key Value
    public function groupByKey(array $array, string $key): array
    {
        $grouped = [];

        foreach($array as $item){
            if(isset($item[$key])){
                $groupedItem = $item[$key];
                $grouped[$groupedItem][] = $item;
            }
        }

        return $grouped;
    }

    // Extract a Subset of an Associative Array Based on Keys
    public function extractSubset(array $array, array $keys): array
    {
        $subset = [];

        foreach ($keys as $key) {
            if (array_key_exists($key, $array)) {
                $subset[$key] = $array[$key];
            }
        }

        return $subset;
    }

    // Add Prefix or Suffix to Keys in an Associative Array
    public function addPrefixSuffixToKeys(array $array, string $prefix = '', string $suffix = ''): array
    {
        $newArr = [];

        foreach ($array as $key => $value) {
            $newKey = $prefix . $key . $suffix;
            $newArr[$newKey] = $value;
        }

        return $newArr;
    }

    // Create an Associative Array from Two Indexed Arrays:
    public function createAssociativeArray(array $keys, array $values): array
    {
        $newAssociative = [];

        for ($i = 0; $i < count($keys); $i++) {

            if ($i < count($values)) {
                $newAssociative[$keys[$i]] = $values[$i];
            } else {
                $newAssociative[$keys[$i]] = null ;
            }
        }

        return $newAssociative;
    }

    // Rename Keys Based on a Mapping Array
    public function renameKeysWithMapping(array $array, array $mapping): array
    {
        $newArr = [];

        foreach ($array as $key => $value) {

            if (isset($mapping[$key])) {
                $newKey = $mapping[$key];
            } else {
                $newKey = $key;
            }

            $newArr[$newKey] = $value;
        }

        return $newArr;
    }

    // Check for Duplicate Keys Across Multiple Arrays
    public function findDuplicateKeys(array $arrays): array
    {
        $duplicates = [];
        $keyCounts = [];

        foreach ($arrays as $array) {

            foreach ($array as $key => $value) {

                if (isset($keyCounts[$key])) {
                    $keyCounts[$key]++;
                } else {
                    $keyCounts[$key] = 1;
                }
            }
        }

        foreach ($keyCounts as $key => $count) {
            if ($count > 1) {
                $duplicates[] = $key;
            }
        }

        return $duplicates;
    }
}
