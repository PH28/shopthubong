<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $role_id = Role::pluck('name','id');  
      $listUser = User::all();
      return view('admin.user.list', compact('listUser','role_id'));   
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role_id = Role::pluck('name','id');
         
        return view('admin.user.create',compact('role_id'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try {
            $data= $request->all();
            $data['status'] = User::NOTACTIVE;
            $data['password'] = '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm';
            $user= User::create($data);
            return response()->json([
                'data'=>$user,
                'role' => $user->role->name,
                'message'=>'Tạo người dùng thành công'
            ],200);
         } catch (\Exception $e) {
             return back()->with('fail',$e->getMessage());
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $role_id = Role::pluck('name','id');
        return view('admin.user.edit', compact('user','role_id'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try{
              $data = $request->all();
              $user->update($data);
              return back()->with('success',('Cập nhật người dùng thành công'));
        } catch (\Exception $e) {
             return back()->with('fail',$e->getMessage());
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userDetail($id)
    {
        //
        try {
        $user=User::with('orders')->where('id',$id)->first() ;
        return view('admin.user.detail',compact('user'));
        } catch (\Exception $e) {
             return back()->with('fail',$e->getMessage());
        }
    } 
    public function destroy($id)
    {
        $user=User::withCount('orders')->where('id',$id)->first() ;
        try{

            if($user->role_id == User::USER)
             {
             if($user->orders_count== 0)

               {
                    $user->reviews()->delete();
                    $user->delete();
                    return response()->json([
                    'response'=>'0',
                    'message'=>'Xoá người dùng thành công',
                    ],200);
                   
                 }   
                    return response()->json([
                    'response'=>'1',
                    'message'=>'Xóa thất bại vì người dùng này đang đặt hàng',
                    ],200); 
            }
            return response()->json([
                    'response'=>'2',
                    'message'=>'Không thể xóa Admin',
                    ],200);       

        } catch (\Exception $e) {
             return back()->with('fail',$e->getMessage());
        }
    }
}