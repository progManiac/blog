<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comment`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `post`
 */
class m180717_123948_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comment', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'post_id' => $this->integer()->notNull(),
            'body' => $this->text()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-comment-user_id',
            'comment',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-comment-user_id',
            'comment',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `post_id`
        $this->createIndex(
            'idx-comment-post_id',
            'comment',
            'post_id'
        );

        // add foreign key for table `post`
        $this->addForeignKey(
            'fk-comment-post_id',
            'comment',
            'post_id',
            'post',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-comment-user_id',
            'comment'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-comment-user_id',
            'comment'
        );

        // drops foreign key for table `post`
        $this->dropForeignKey(
            'fk-comment-post_id',
            'comment'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            'idx-comment-post_id',
            'comment'
        );

        $this->dropTable('comment');
    }
}
