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
        $users = $this->contact;
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
        $title = "Create User - Coming soon!!";
        return View::make('admin/contact/create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     * POST /admin\admincontact
     *
     * @return Response
     */
    public function postStore()
    {
        //
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
        /*if (Input::get('type'))
            $contact->where('type', '=', Input::get('type'));*/

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