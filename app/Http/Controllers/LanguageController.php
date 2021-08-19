<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;

class LanguageController extends Controller
{


    // public  function languages()
    // {
    //     $dir     = base_path() . '/resources/lang/';
    //     $glob    = glob($dir . "*", GLOB_ONLYDIR);
    //     $arrLang = array_map(
    //         function ($value) use ($dir) {
    //             return str_replace($dir, '', $value);
    //         },
    //         $glob
    //     );
    //     $arrLang = array_map(
    //         function ($value) {
    //             return preg_replace('/[0-9]+/', '', $value);
    //         },
    //         $arrLang
    //     );
    //     $arrLang = array_filter($arrLang);

    //     return $arrLang;
    // }

    // public function manageLanguage($currantLang)
    // {

    //     $languages = $this->languages();

    //     $dir = base_path() . '/resources/lang/' . $currantLang;
    //     if (!is_dir($dir)) {
    //         $dir = base_path() . '/resources/lang/en';
    //     }
    //     $arrLabel = json_decode(file_get_contents($dir . '.json'));
    //     $arrFiles = array_diff(
    //         scandir($dir),
    //         array(
    //             '..',
    //             '.',
    //         )
    //     );
    //     $arrMessage = [];

    //     foreach ($arrFiles as $file) {
    //         $fileName = basename($file, ".php");
    //         $fileData = $myArray = include $dir . "/" . $file;
    //         if (is_array($fileData)) {
    //             $arrMessage[$fileName] = $fileData;
    //         }
    //     }

    //     return view('lang.index', compact('languages', 'currantLang', 'arrLabel', 'arrMessage'));
    // }

    // public function storeLanguageData(Request $request, $currantLang)
    // {
    //     if (\Auth::user()->can('Create Language')) {
    //         $Filesystem = new Filesystem();
    //         $dir = base_path() . '/resources/lang/';
    //         if (!is_dir($dir)) {
    //             mkdir($dir);
    //             chmod($dir, 0777);
    //         }
    //         $jsonFile = $dir . "/" . $currantLang . ".json";

    //         if (isset($request->label) && !empty($request->label)) {
    //             file_put_contents($jsonFile, json_encode($request->label));
    //         }

    //         $langFolder = $dir . "/" . $currantLang;

    //         if (!is_dir($langFolder)) {
    //             mkdir($langFolder);
    //             chmod($langFolder, 0777);
    //         }
    //         if (isset($request->message) && !empty($request->message)) {
    //             foreach ($request->message as $fileName => $fileData) {
    //                 $content = "<?php return [";
    //                 $content .= $this->buildArray($fileData);
    //                 $content .= "];";
    //                 file_put_contents($langFolder . "/" . $fileName . '.php', $content);
    //             }
    //         }

    //         return redirect()->route('manage.language', [$currantLang])->with('success', __('Language save successfully.'));
    //     } else {
    //         return redirect()->back();
    //     }
    // }
}