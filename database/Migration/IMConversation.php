<?php declare(strict_types=1);


namespace Database\Migration;


use Swoft\Db\Schema\Blueprint;
use Swoft\Devtool\Annotation\Mapping\Migration;
use Swoft\Devtool\Migration\Migration as BaseMigration;

/**
 * Class IMConversation
 *
 * @since 2.0
 *
 * @Migration(time=20191005164440)
 */
class IMConversation extends BaseMigration
{
    protected  $tableNum = 16;
    /**
     * @return void
     */
    public function up(): void
    {
        $this->schema->createIfNotExists('IMRecentSession', function (Blueprint $blueprint){
            $blueprint->mediumIncrements('id');
            $blueprint->integer('senderUserId')->unsigned()->comment('用户Id');
            $blueprint->integer('targetId')->unsigned()->comment('群Id');
            $blueprint->string('conversationType')->comment('会话类型');
            $blueprint->tinyInteger('status',false, true, 3)->default(0)->comment('0-正常, 1-用户A删除');
            $blueprint->tinyInteger('top',false, true, 3)->default(0)->comment('0-正常, 1-置顶');
            $blueprint->tinyInteger('notification', false, true, 3)->default(1)->comment('0-提醒，0-不用提醒');
            $blueprint->bigInteger('createdAt')->unsigned()->comment('创建时间');
            $blueprint->bigInteger('updatedAt')->nullable(true)->comment('更新时间');
            $blueprint->index(['senderUserId', 'targetId', 'conversationType']);
            $blueprint->index(['senderUserId', 'updatedAt']);
            $blueprint->index('status');
        });

    }

    /**
     * @return void
     */
    public function down(): void
    {
        for($i = 0; $i < $this->tableNum; $i++){
            $this->schema->dropIfExists('IMMessage_'.$i);
        }
    }
}
