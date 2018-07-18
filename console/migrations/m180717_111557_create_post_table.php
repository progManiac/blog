<?php

use yii\db\Migration;

/**
 * Handles the creation of table `posts`.
 */
class m180717_111557_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'title' => $this->string(30)->notNull()->unique(),
            'body' => $this->text()->notNull(),
            'created_at' => $this->timestamp()->notNull(),
            'status' => $this->smallInteger()->defaultValue(0)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('post');
    }
}
