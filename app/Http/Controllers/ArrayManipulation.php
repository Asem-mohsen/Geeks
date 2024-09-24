<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ArrayManipulationService;

class ArrayManipulation extends Controller
{
    public function index(){

        return view('arrayManipulation.index');
    }

    // Rename Keys in an Associative Array
    public function renameKeyMethod()
    {
        $service = new ArrayManipulationService();
        $renaming = $service->renameKeys(['fisrt_name'=>'Assem', 'second_name'=>'mohsen'] , 'fisrt_name' , 'Name');

        return view('arrayManipulation.renaming' , compact('renaming'));
    }

    // Swap Keys and Values in an Associative Array
    public function swapMethod()
    {
        $service  = new ArrayManipulationService();

        $swap = $service->swapKeysAndValues(['name' => 'mohamed' , 'age'=>30]);

        return view('arrayManipulation.swap' , compact('swap'));
    }

    // Remove Specific Keys from an Associative Array
    public function removeMethod()
    {
        $service  = new ArrayManipulationService();

        $data = [
            'name' => 'assem',
            'age' => 23,
            'First_name'=> 'mohamed',
            'l-name'=>'lotfy',
        ];
        $removed = $service->removeKeys($data,['name','First_name']);

        return view('arrayManipulation.removeKey' , compact('removed'));
    }

    // Change Key Case (Uppercase/Lowercase) in an Associative Array
    public function changeKeyCaseMethod()
    {
        $service  = new ArrayManipulationService();

        $data = [
            'name' => 'assem',
            'age' => 23,
            'first_name'=> 'mohamed',
            'l-name'=>'lotfy',
        ];

        $changedCase = $service->changeKeyCase($data,0);

        return view('arrayManipulation.changeKeyCase' , compact('changedCase'));
    }

    // Sort Associative Array by Keys
    public function sortByKeys()
    {
        $service  = new ArrayManipulationService();

        $data = [
            'name' => 'assem',
            'age' => 23,
            'first_name'=> 'mohamed',
            'l-name'=>'lotfy',
        ];

        $sorting = $service->sortByKeys($data, true);

        return view('arrayManipulation.sortByKeys' , compact('sorting'));
    }

    // Merge Two Associative Arrays by Overwriting Keys
    public function mergeAssociative()
    {
        $service  = new ArrayManipulationService();

        $array1 = [
            'name' => 'assem',
            'age' => 23,
            'first_name'=> 'mohamed',
            'l-name'=>'lotfy',
        ];
        $array2 = [
            'nametwo' => 'mohamed',
            'age' => 23,
            'first_name'=> 'ismale',
            'l-name'=>'lotfy',
        ];

        $merged = $service->mergeArrays($array1, $array2);

        return view('arrayManipulation.mergeAssociative' , compact('merged'));
    }

    // Find Missing Keys in an Associative Array
    public function missingKeys()
    {
        $service  = new ArrayManipulationService();

        $array = [
            'name' => 'assem',
            'age' => 23,
        ];
        $required = ['name' , 'phone'];

        $missing = $service->findMissingKeys($array, $required);

        return view('arrayManipulation.missingKeys' , compact('missing'));
    }

    //Reorder Associative Array Keys
    public function reorder()
    {
        $service  = new ArrayManipulationService();

        $array = [
            'name' => 'assem',
            'age' => 23,
            'phone'=> 0121311131231,
        ];

        $order = ['phone' , 'name' , 'age'];

        $reorder = $service->reorderKeys($array, $order);

        return view('arrayManipulation.reorder' , compact('reorder'));
    }

    // Replace Specific Keys with New Keys
    public function replacekeysNew()
    {
        $service  = new ArrayManipulationService();

        $array = [
            'name' => 'assem',
            'age' => 23,
            'phone'=> 0121311131231,
        ];
        $map = [
            'name' => 'full name',
            'age' => 'new age',
        ];

        $replaced = $service->replaceKeys($array, $map);

        return view('arrayManipulation.replacekeysNew' , compact('replaced'));
    }

    // Group Associative Array by Key Value
    public function groupValues()
    {
        $service  = new ArrayManipulationService();

        $array = [
                ['name' => 'assem'  ,'age' => 23 , 'role' => 2],
                ['name' => 'mohamed','age' => 34 , 'role' => 1],
                ['name' => 'mohamed','age' => 34 , 'role' => 2],
                ['name' => 'mohamed','age' => 34 , 'role' => 1],
        ];

        $groups = $service->groupByKey($array, "role");

        return view('arrayManipulation.groupValues' , compact('groups'));
    }

    // Extract a Subset of an Associative Array Based on Keys
    public function extractSubset()
    {
        $service  = new ArrayManipulationService();

        $array = [
            'name' => 'assem',
            'age' => 23,
            'gender' => 'male',
            'phone'=> 0121311131231,
        ];
        $keys = ['name' , 'gender'];
        $subset = $service->extractSubset($array, $keys);
        return view('arrayManipulation.extractSubset' , compact('subset'));
    }

    // Add Prefix or Suffix to Keys in an Associative Array
    public function addPrefixSuffixToKeys()
    {
        $service  = new ArrayManipulationService();

        $array = [
            'name' => 'assem',
            'age' => 23,
            'gender' => 'male',
            'phone'=> 0121311131231,
        ];

        $prefixed = $service->addPrefixSuffixToKeys($array, 'user_' , '_data');

        return view('arrayManipulation.addPrefixSuffixToKeys' , compact('prefixed'));
    }

    // Create an Associative Array from Two Indexed Arrays:
    public function createAssociativeArray()
    {
        $service  = new ArrayManipulationService();

        $keys = ['name','age','phone'];
        $values = ['assem',23,0232323];

        $associativeArray = $service->createAssociativeArray($keys,$values);

        return view('arrayManipulation.createAssociativeArray' , compact('associativeArray'));
    }

    // Rename Keys Based on a Mapping Array
    public function renameKeysWithMapping()
    {
        $service  = new ArrayManipulationService();

        $array = [
            'name' => 'assem',
            'age' => 23,
            'gender' => 'male',
            'phone'=> 0121311131231,
        ];
        $mapping = ['name' => 'full_name', 'age' => 'years'];
        $renames = $service->renameKeysWithMapping($array , $mapping);

        return view('arrayManipulation.renameKeysWithMapping' , compact('renames'));
    }

    // Check for Duplicate Keys Across Multiple Arrays
    public function findDuplicateKeys()
    {
        $service  = new ArrayManipulationService();

        $array = [
            'name' => 'assem',
            'age' => 23,
            'gender' => 'male',
            'phone'=> 0121311131231,
        ];
        $array2 = [
            'name' => 'assem',
            'age' => 23,
            'gender' => 'male',
        ];

        $dublicates = $service->findDuplicateKeys([$array , $array2]);

        return view('arrayManipulation.findDuplicateKeys' , compact('dublicates'));
    }
}

