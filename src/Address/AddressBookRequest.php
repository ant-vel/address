<?php

/*
 * This file is part of the Antvel Shop package.
 *
 * (c) Gustavo Ocanto <gustavoocanto@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Antvel\Address;

use Antvel\Http\Request;

class AddressBookRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'line2' => 'max:100',
            'country' => 'required',
            'city' => 'required|string',
            'state' => 'required|string',
            'phone' => 'required|max:20',
            'line1' => 'required|max:100',
            'zipcode' => 'required|min:3',
            'name_contact' => 'required|string|max:60'
          ];
    }
}
