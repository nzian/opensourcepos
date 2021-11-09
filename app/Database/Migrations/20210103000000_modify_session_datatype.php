<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Migration_modify_session_datatype extends Migration
{
	public function up(): void
	{
		error_log('Migrating modify_session_datatype');

		execute_script(APPPATH . 'migrations/sqlscripts/3.3.4_modify_session_datatype.sql');

		error_log('Migrating modify_session_datatype');
	}

	public function down(): void
	{
	}
}
?>