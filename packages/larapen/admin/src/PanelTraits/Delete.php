<?php

namespace Larapen\Admin\PanelTraits;

trait Delete
{
    /*
    |--------------------------------------------------------------------------
    |                                   DELETE
    |--------------------------------------------------------------------------
    */

    /**
     * Delete a row from the database.
     *
	 * @param $id
	 * @return mixed
	 */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
