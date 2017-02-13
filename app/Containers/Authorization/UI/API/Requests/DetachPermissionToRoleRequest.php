<?php

namespace App\Containers\Authorization\UI\API\Requests;

use App\Port\Request\Abstracts\Request;

/**
 * Class DetachPermissionToRoleRequest.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class DetachPermissionToRoleRequest extends Request
{

    /**
     * Define which Roles and/or Permissions has access to this request..
     *
     * @var  array
     */
    protected $access = [
        'roles'       => 'admin',
        'permissions' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     *
     * @var  array
     */
    protected $decode = [

    ];

    /**
     * Defining the URL parameters (`/stores/999/items`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [

    ];

    /**
     * @return  array
     */
    public function rules()
    {
        return [
            'role_name'       => 'required|exists:roles,name',
            'permission_name' => 'required|exists:permissions,name',
        ];
    }

    /**
     * @return  bool
     */
    public function authorize()
    {
        return $this->hasAccess();
    }
}
