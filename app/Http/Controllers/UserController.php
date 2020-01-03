<?php
namespace App\Http\Controllers;

use App\Repositories\UserRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class AuthController отвечает за регистрацию и авторизацию пользователей
 *
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Репозиторий пользователей
     *
     * @var UserRepositoryInterface
     */
    private $users;

    /**
     * UserController constructor.
     *
     * @param UserRepositoryInterface $users
     */
    public function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    /**
     * Отображает список всех пользователей
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list()
    {
        return view('user.list', ['users' => $this->users->all()]);
    }

    /**
     * Отображает форму регистрации
     */
    public function signup()
    {
        return view('user.signup');
    }

    /**
     * Сохраняет нового пользователя
     *
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'login'     => 'required|unique:users|max:255',
            'firstname' => 'required',
            'lastname'  => 'required',
            'city'      => 'required',
            'age'       => 'required|numeric|min:18|max:100',
            'interests' => 'required|max:65000',
            'password'  => 'required|min:3|max:255',
            'gender'    => 'required|bool',
        ]);

        $data             = $request->all([
            'login',
            'firstname',
            'lastname',
            'city',
            'age',
            'interests',
            'password',
            'gender',
        ]);
        $data['password'] = bcrypt($data['password']);
        $data['created_at'] = Carbon::now();

        if ($this->users->store($data) === null) {
            return redirect(route('user.create'))
                ->withErrors('Unable to save profile')
                ->withInput();
        }

        return redirect(route('user.signin'));
    }

    /**
     * Отображает форму входа
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function signin()
    {
        return view('user.signin');
    }

    /**
     * Авторизует пользователя
     *
     * @param  Request $request
     * @throws \Illuminate\Validation\ValidationException
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function auth(Request $request)
    {
        $this->validate($request, [
            'login'    => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->all(['login', 'password']);

        if (!Auth::attempt($credentials)) {
            return redirect(route('user.signin'))
                ->withErrors('Wrong login or password')
                ->withInput();
        }

        return redirect('/');
    }

    /**
     * Выход пользователя
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    /**
     * Отображает данные пользователя
     *
     * @param  int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $user = $this->users->get($id);

        if ($user === null) {
            throw new NotFoundHttpException();
        }

        return view('user.show', ['user' => $user]);
    }
}
