<?php

namespace App\Http\Controllers;

use App\Export\AddressExport;
use App\Log;
use App\Model\AddressBook;
use App\Model\City;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AddressBookController extends Controller
{
    public $controller = "AddressBook"; //Controller Name
    public function index(Request $request) {
        /**
         *
         */
        $query = AddressBook::query();

        $filter = $request->all();
        if(isset($filter["zip_code"]) && $filter["zip_code"] != ''){
            $query->where("zip_code", $request->get("zip_code"));
        }
        if(isset($filter["city"]) && $filter["city"] != ''){
            $query->where("city", $request->get("city"));
        }
        if(isset($filter["export"]) && $filter["export"] != ''){

            if($filter['export']=='xml'){

                return  (new AddressExport)->download('invoices.xml', \Maatwebsite\Excel\Excel::XML);



            }
            else{
                #return (new AddressBookExport($query))->download("{$this->controller}.xlsx", \Maatwebsite\Excel\Excel::XLSX);

                return (new AddressExport)->download('addressBook.csv', \Maatwebsite\Excel\Excel::CSV);
            }
        }
        $data = $query->paginate(10);

        $cities = City::pluck("name", "id");
        return view("index", compact("data", 'cities'));

    }


    public function create(Request $request){
        /**
         *
         */
        if($request->isMethod("post")){

            $request->validate(AddressBook::rules());

            $data = $request->all();

            if($request->hasFile("profile_pic")){
                $data["profile_pic"]  = $request->file('profile_pic')->store('profile');
            }

            if(AddressBook::create($data)){
                Log::create(["message" => "A new address created", "data" => json_encode($data), "ip" => $request->ip()]);
                return redirect("/");
            }

        }

        $cities = City::pluck("name", "id");
        return view("create", compact("cities") );

    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function update(Request $request, $id) {
        $data = AddressBook::find($id);
        if($request->isMethod("post")){

            $request->validate(AddressBook::rules($id));

            $form_data = $request->all();

            if($request->hasFile("profile_pic")){
                $form_data["profile_pic"]  = $request->file('profile_pic')->store('profile');
            } else{
                $form_data["profile_pic"]  = $request->get('old_pic');
            }

            if($data->update($form_data)){
                Log::create(["message" => "A new address updated", "data" => json_encode($data), "ip" => $request->ip()]);
                return redirect("/");
            }

        }


        $cities = City::pluck("name", "id");
        return view("edit", compact("data", "cities") );

    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteData(Request $request,$id){
        $data= AddressBook::find($id);
        if($data){
            $res = AddressBook::where('id',$id)->delete();
            Log::create(["message" => "A new address Deleted", "data" => json_encode($data), "ip" => $request->ip()]);
            return redirect("/");
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkEmail(Request $request){
        $email = $request->input('email');
        $isExists = AddressBook::where('email',$email)->first();
        if($isExists){
            return response()->json(array("exists" => true));
        }else{
            return response()->json(array("exists" => false));
        }
    }
}
