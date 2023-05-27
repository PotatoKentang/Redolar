<?PHP


namespace App\Http\Controllers;

class QueryHandler{
    static public function includeData($hash,$request,$query)
    {
        $include = [];
        foreach ($hash as $key => $value) {
            if ($request->query($key)) {
                $include[] = $value;
            }
        }
        return $query->with($include);
    }

    static public function includeMissing($hash,$request,$query)
    {
        $include = [];
        foreach ($hash as $key => $value) {
            if ($request->query($key)) {
                $include[] = $value;
            }
        }
        return $query->loadMissing($include);
    }


}
