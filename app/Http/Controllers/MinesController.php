<?php
        // ->join('metrics', 'mine_data_values.metric_id' , '=' , 'metrics.id')// ->join('users', 'mine_data.user_id' , '=' , 'users.id')

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MinesController extends Controller
{
    public function index()
    {

        $filterQuery = DB::table('mine_data_values')
                    ->join('mine_data' , 'mine_data_values.mine_data_id' , '=' ,'mine_data.id')
                    ->join('mines', 'mine_data.mine_id' , '=' , 'mines.id')
                    ->join('countries', 'mine_data.country_id' , '=' , 'countries.id');

        if(!empty($commedityId)){
            $filterQuery->join('commodities', 'mine_data.commodity_id' , '=' , 'commodities.id')->where('commodities.id' , $commedityId);
        }

        if(!empty($typeId)){
            $filterQuery->join('types', 'mine_data.type_id' , '=' , 'types.id')->where('types.id' , $type);
        }

        if(!empty($quarterId)){

            $quartersQuery = DB::table('periods')->select('quarter', 'year')->where('id', $quarterId)->first();

            if ($quartersQuery) {
                $querter = $quartersQuery->quarter;
                $year    = $quartersQuery->year;

                $previousQuarters = 8;

                $quarters = DB::table('periods')->select('id')->where(function ($query) use ($year, $querter) {
                                $query->where('year', '<', $year)
                                    ->orWhere(function ($query) use ($year, $querter) {
                                    $query->where('year', '=', $year)
                                            ->where('quarter', '<=', $querter);
                                });
                            })
                            ->orderBy('year', 'desc')
                            ->orderBy('quarter', 'desc')
                            ->limit($previousQuarters)
                            ->pluck('id');


                $filterQuery->join('periods', 'mine_data.period_id', '=', 'periods.id')
                            ->whereIn('periods.id', $quarters)
                            ->select('periods.id as period_id', 'periods.quarter', 'periods.year')
                            ->groupBy('periods.id');
            }
        }

        // numenator and denominator
        if(!empty($numenator) && !empty($denominator) ){
            $filterQuery->join('metrics', 'mine_data_values.metric_id' , '=' , 'metrics.id')
                        ->join('variables', 'metrics.id' , '=' , 'variables.metric_id')
                        ->where(DB::raw("CONCAT('metrics.variable_prefix , variables.field_name')") , '=' , $numenator)
                        ->where(DB::raw("CONCAT('metrics.variable_prefix , variables.field_name')") , '=' , $denominator);
        }

        if(!empty($filter) && !empty($equality) && !empty($value) ){
            $filterQuery->join('metrics', 'mine_data_values.metric_id' , '=' , 'metrics.id')
                        ->join('variables', 'metrics.id' , '=' , 'variables.metric_id');

                        if($equality == 'is greater than'){
                            $filterQuery->where($filter, '>' , $value);
                        }else if($equality == 'is less than'){
                            $filterQuery->where($filter, '<' , $value);
                        }else if($equality == 'is equal to'){
                            $filterQuery->where($filter, '=' , $value);
                        }else if($equality == 'is greater than or equal'){
                            $filterQuery->where($filter, '<=' , $value);
                        }
        }

        // countries
        if(!empty($hemisphere)){
            $filterQuery->where('countries.hemisphere' , $hemisphere);

            if(!empty($region)){
                $filterQuery->where('countries.region' , $region);

                if(!empty($subRegion)){
                    $filterQuery->where('countries.subregion' , $subRegion);

                    if(!empty($country)){
                        $filterQuery->where('countries.name' , $country);
                    }

                }

            }
        }

        if(!empty($moduleId)){
            $filterQuery->join('companies', 'mine_data.company_id' , '=' , 'companies.id')
                        ->join('company_module','companies.id' , '=' , 'company_module.company_id')
                        ->join('modules','company_module.module_id' , '=' , 'modules.company_id')
                        ->where('modules.id' , $moduleId);
        }

        if(!empty($isCamp)){
            $filterQuery->where('mine_data.is_camp' , $isCamp);
        }

        if(!empty($undergroundMethod)){
            $filterQuery->where('underground_mining_method' , $undergroundMethod);
        }

        if(!empty($undergroundOperator)){
            $filterQuery->where('underground_mining_operator' , $undergroundOperator);
        }

        if(!empty($millingMethod)){
            $filterQuery->where('milling_method' , $millingMethod);
        }

        if(!empty($miningOpertator)){
            $filterQuery->where('open_pit_mining_operator' , $miningOpertator);
        }

        if(!empty($removeZero)){
            $filterQuery->join('metrics', 'mine_data_values.metric_id' , '=' , 'metrics.id')
                        ->join('variables', 'metrics.id' , '=' , 'variables.metric_id')
                        ->where('mine_data_values.values' , '!=' , 0);
        }

        $data = $filterQuery->where('mines.status' , '1')->get();

        dd($data);
    }
}
