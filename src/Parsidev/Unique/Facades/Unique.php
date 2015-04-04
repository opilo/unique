<?PHP namespace Parsidev\Unique\Facades;

use Illuminate\Support\Facades\Facade;

class Unique extends Facade {

    protected static function getFacadeAccessor() {
        return 'unique';
    }

}
