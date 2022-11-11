<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;

class ConfigurationsController extends Controller
{
    public function configurations()
    {
        return response()->json([
            'items' => Configuration::get()
        ]);
    }

    public function store(Request $request)
    {
        $id = $request->input('id');

        if($id)
            $configuration = Configuration::find($id);
        else
            $configuration = new Configuration;

        $configuration->value = trim(htmlspecialchars($request->input('value')));
        $configuration->save();

        return response()->json([
            'item' => $configuration
        ]);
    }

}
