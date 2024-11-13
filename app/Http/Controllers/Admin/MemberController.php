<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\MemberAddRequest;
use App\Http\Requests\MemberEditRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\MemberModel;
use App\Traits\DeleteModelTrait;

class MemberController extends Controller
{
    use DeleteModelTrait;

    private $member;
    
    public function __construct(MemberModel $member)
    {
        $this->member = $member;
     
    }
    public function index(Request $request)
    {
        $search = $request->input('search_keyword');
        $members = null;
        if ($search) {
            $searchUnicode = '%' . $search . '%';
            $members = $this->member::select('id', 'name', 'email')
                ->where('email', 'LIKE', $searchUnicode)
                ->latest()
                ->paginate(10);
            $members->setPath('members?search_keyword=' . $search);
        } else {
            $members = $this->member->latest()->paginate(10);
        }
        return view('admin.member.index', compact('members'));
    }
     
    public function create()
    {
        
        return view('admin.member.add');
    }
    public function store(MemberAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->member->create([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);           
            
            DB::commit();
            return redirect()->route('member.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message:' . $exception->getMessage() . 'Line:' . $exception->getLine());
        }
    }
    public function edit($id)
    {
       
        $member = $this->member->find($id);
      
        return view('admin.member.edit', compact('member'));
    }

    public function update(MemberEditRequest $request, $id)
    {

        try { 
            $update['name'] = $request->name;
            $update['phone'] = $request->phone;
            $update['address'] = $request->address;
            if (!empty($request->password)) {
                $update['password'] = Hash::make($request->password);
            }
            DB::beginTransaction();
            $this->member->find($id)->update($update);
            $member = $this->member->find($id);
           
            DB::commit();
            return redirect()->route('member.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message:' . $exception->getMessage() . 'Line:' . $exception->getLine());
        }

    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->member);

    }
}
