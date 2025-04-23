<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/counter/{num}", function(int $num) {
    for($i = 0; $i < $num; $i++) {
        echo $i . PHP_EOL;
    }
});

Route::get("/counterv2/{limite}/{valor_soma}", function(float $limite, float $valor_soma): void {
    for($i = 0.0; $i < $limite; $i += $valor_soma) {
        echo $i . PHP_EOL;
    }
});

Route::get("/checagem/{num}", function(int $num): string {
    if($num % 2 == 0) {
        return "é par";
    }

    return "é impar";
});

Route::get("/e_primo/{num}", function(int $num): string {
    $divisores = 0;

    for ($i = 2; $i <= sqrt($num); $i++) {
        if (($num % $i) == 0) {
            return "{$num} não é primo";
        }
    }

    return "{$num} é primo";
});

Route::get("/calcular_soma/{num1}/{num2}", function(float $num1, float $num2) {
    return $num1 + $num2;
});

Route::get("/pegar_params", function(Request $req) {
    $name = $req->query("number", 0);

    return $name;
});

Route::get("/e_divisivel", function(Request $req): string {
    $num1 = $req->query("num1", 0);
    $num2 = $req->query("num2", 0);

    if($num1 % $num2 == 0) {
        return "{$num1} é divisivel por {$num2}";
    }

    return "{$num1} não é divisivel por {$num2}";
});

?>