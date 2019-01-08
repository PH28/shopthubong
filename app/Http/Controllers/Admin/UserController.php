<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Http\Requests\UserRequest;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $listUser = User::all();
      return view('admin.user.list', compact('listUser'));   
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
            $user= User::create($data);
            return redirect()->route('users.show',$user->id)->with('success',('Tạo người dùng thành công'));
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
        $listUser = User::where('id',$id)->get();
         return view('admin.user.show', compact('listUser'));
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
    public function update(Request $request, User $user)
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
    public function destroy($id)
    {
        $user=User::withCount('orders')->where('id',$id)->first() ;
        try{

            if($user->role_id == User::USER)
             {
             if($user->orders_count== 0)

               {
                    $user->delete();
                    return back()->with('success', ('Xoá người dùng thành công'));
                    }   

                    return back()->with('fail', ('Xóa thất bại vì người dùng này đang đặt hàng'));  
            }
           return back()->with('fail', ('Không thể xóa Admin'));             

        } catch (\Exception $e) {
             return back()->with('fail',$e->getMessage());
        }
    }
}