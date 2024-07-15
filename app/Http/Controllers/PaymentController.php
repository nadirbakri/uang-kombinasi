<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nominal;

class PaymentController extends Controller
{
    private $combinations = [];

    public function index()
    {
        return view('welcome');

    }
    public function get(Request $request)
    {
        $money = [100, 200, 500, 1000, 5000, 10000, 20000, 50000, 1000000];
        $total = $request->input('total');

        if ($total >= 100000) {
            return response()->json("kosong");
        }

        $this->combinations = [];
        $this->findCombinations($total, $money);

        $filteredCombinations = [];

        foreach ($this->combinations as $combination) {
            $sum = array_sum($combination);

            if ($sum > $total) {
                if (!isset($filteredCombinations[$sum])) {
                    $filteredCombinations[$sum] = [
                        'total' => $sum,
                        'combinations' => []
                    ];
                }
                $filteredCombinations[$sum]['combinations'][] = $combination;
            }
        }

        $number = 1;
        foreach ($money as $value) {
            if ($value > $total) {
                if ($number == 1) {
                    $number++;
                    continue;
                }

                $sum = $value;

                if (!isset($filteredCombinations[$sum])) {
                    $filteredCombinations[$sum] = [
                        'total' => $sum,
                        'combinations' => []
                    ];
                }
                $filteredCombinations[$sum]['combinations'][] = [$value];
            }
        }

        $filteredCombinations = array_values($filteredCombinations);
        
        usort($filteredCombinations, function ($a, $b) {
            return $a['total'] <=> $b['total'];
        });
    
        return response()->json($filteredCombinations);
    }

    private function findCombinations($amount, $money, $currentCombination = [], $startIndex = 0)
    {
        if ($amount <= 0) {
            $this->combinations[] = $currentCombination;
            return;
        }

        for ($i = $startIndex; $i < count($money); $i++) {
            if ($money[$i] <= $amount) {
                $this->findCombinations($amount - $money[$i], $money, array_merge($currentCombination, [$money[$i]]), $i);
            } else {
                $this->combinations[] = array_merge($currentCombination, [$money[$i]]);
                return;
            }
        }
    }
}
