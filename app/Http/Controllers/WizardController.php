<?php


namespace App\Http\Controllers;

use App\Services\WizardService;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Model\UUID\Keys;

class WizardController extends Controller
{
    /** @var WizardService */
    protected $wizard;

    /** @var Keys */
    protected $keys;

    public function __construct(WizardService $wizard, Keys $keys)
    {
        $this->wizard = $wizard;
        $this->keys = $keys;
    }

    public function index()
    {
        return view('com');
    }

    public function step1(Request $request): array
    {
        return [
            $this->wizard->shuffleLetters($request->get('province'),  $request->get('email')),
            $request->get('from'),
            $request->get('to')
        ];
    }

    public function step2(Request $request):JsonResponse
    {
        $uuid = $this->wizard->setUUIDForEveryDate($request[0], $request[1], $request[2]['id']);

        $this->wizard->insert($uuid);

        return response()->json($uuid);
    }
}
