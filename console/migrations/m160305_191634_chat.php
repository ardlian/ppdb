<?php
use yii\db\Migration;
class m160305_191634_chat extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%chat}}', [
            'time' => $this->float(),
            'user_id' => $this->integer()->notNull(),
            'username' => $this->string(32),
            'text' => $this->text(),
            'PRIMARY KEY ([[time]])'
            ], $tableOptions);
    }
    public function down()
    {
        $this->dropTable('{{%chat}}');
    }
}