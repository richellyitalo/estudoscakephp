<?php
use Migrations\AbstractMigration;

class DBVersao01 extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('cities');
        $table
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->create();

        $table = $this->table('user_phones');
        $table
            ->addColumn('number', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->create();

        $table = $this->table('users');
        $table
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('role', 'integer', [
                'default' => null,
                'limit' => 6,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('address', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('district', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('city_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'email',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'city_id',
                ]
            )
            ->create();

        $this->table('user_phones')
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('users')
            ->addForeignKey(
                'city_id',
                'cities',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

    }

    public function down()
    {
        $this->table('user_phones')
            ->dropForeignKey(
                'user_id'
            );

        $this->table('users')
            ->dropForeignKey(
                'city_id'
            );

        $this->dropTable('cities');
        $this->dropTable('user_phones');
        $this->dropTable('users');
    }
}
