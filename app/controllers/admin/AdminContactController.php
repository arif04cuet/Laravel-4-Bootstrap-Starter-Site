<?php

class AdminContactController extends \AdminController
{
    protected $contact;

    public function __construct(Contact $contact)
    {
        parent::__construct();
        $this->contact = $contact;
    }

    /**
     * Display a listing of the resource.
     * GET /admin\admincontact
     *
     * @return Response
     */
    public function getIndex()
    {

        $title = 'Lookup';
        // Grab all the contacts

        $states = DB::table('contact')->groupBy('state')->lists('state', 'state');
        $states[""] = "Select One";

        // Show the page
        return View::make('admin/contact/index', compact('contact', 'title', 'states'));
    }

    /**
     * Show the form for creating a new resource.
     * GET /admin\admincontact/create
     *
     * @return Response
     */
    public function getCreate()
    {
        $title = "Create Contact";
        $states = DB::table('contact')->groupBy('state')->lists('state', 'state');
        $states[""] = "Select One";
        $day = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31);
        $month = array("Select", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $years = array_combine(range(date("Y"), 1910), range(date("Y"), 1910));
        $contact = $this->contact;
        return View::make('admin/contact/create', compact('title', 'states', 'day', 'month', 'years','contact'));
    }

    /**
     * Store a newly created resource in storage.
     * POST /admin\admincontact
     *
     * @return Response
     */
    public function postStore()
    {
        $rules = array(
            'company' => 'required',
            'contact_first' => 'required',
            'contact_last' => 'required',
            'title' => 'required',
            'city' => 'required',
            'state' => 'required',
            'email' => 'required|email',

        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/contacts/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {

            //save contact
            $contact = Contact::create(Input::except('_token'));
            // redirect
            Session::flash('message', 'Successfully created Contact!');
            return Redirect::to('admin/contacts');
        }

    }

    /**
     * Display the specified resource.
     * GET /admin\admincontact/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function getShow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /admin\admincontact/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function getEdit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /admin\admincontact/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function postUpdate($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /admin\admincontact/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function getDestroy($id)
    {
        //
    }

    /**
     * Show a list of all the contacts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function getData()
    {
        /* $users = User::leftjoin('assigned_roles', 'assigned_roles.user_id', '=', 'users.id')
             ->leftjoin('roles', 'roles.id', '=', 'assigned_roles.role_id')
             ->select(array('users.id', 'users.username', 'users.email', 'roles.name as rolename', 'users.confirmed', 'users.created_at'));*/

        $contact = Contact::select(array(
            'id_contact',
            'company',
            DB::raw('CONCAT(contact_first," ",contact_last) as contact'),
            'account',
            'address_1',
            'city',
            'state',
            'county',
            'type'
        ));

        //filter contacts
        $columns = Schema::getColumnListing('contact');
        foreach (Input::all() as $key => $val) {
            if (in_array($key, $columns) and !empty($val)) {
                $contact->where($key, 'LIKE', '%' . $val . '%');
            }
        }
        $contact->orderBy('id_contact', 'desc');

        return Datatables::of($contact)
            //->set_index_column('id_contact')
            // ->edit_column('created_at','{{{ Carbon::now()->diffForHumans(Carbon::createFromFormat(\'Y-m-d H\', $test)) }}}')

            ->edit_column('type', function ($contact) {
                return "{$contact->getTypes($contact->type)}";
            })

            ->add_column('actions', '<a href="{{{ URL::to(\'admin/contacts/\' . $id_contact . \'/note\' ) }}}" class="btn glyphicon glyphicon-file" title="show notes"></a>


                                     <a href="{{{ URL::to(\'admin/contacts/\' . $id_contact . \'/delete\' ) }}}" class="btn glyphicon glyphicon-remove" title="delete" style="color: red"></a>

             ')

            ->remove_column('id_contact')

            ->make();
    }
}