<?PHP


namespace App\Http\Controllers;

class QueryHandler{
    static public function includeData($hash,$request,$product)
    {
        $include = [];
        foreach ($hash as $key => $value) {
            if ($request->query($key)) {
                $include[] = $value;
            }
        }
        return $product->with($include);
    }
    
    static public function includeMissing($hash,$request,$product)
    {
        $include = [];
        foreach ($hash as $key => $value) {
            if ($request->query($key)) {
                $include[] = $value;
            }
        }
        return $product->loadMissing($include);
    }


}
