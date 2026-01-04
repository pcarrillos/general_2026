<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProxyViewController extends Controller
{
    /**
     * Mostrar vista específica por panel
     */
    public function showByPanel(Request $request, string $panel, string $view)
    {
        $viewName = "{$panel}.{$view}";

        if (!view()->exists($viewName)) {
            abort(404, 'View not found');
        }

        return view($viewName);
    }
}
