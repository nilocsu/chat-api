<?php declare(strict_types=1);


namespace Database\Migration;


use Swoft\Db\Schema\Blueprint;
use Swoft\Devtool\Annotation\Mapping\Migration;
use Swoft\Devtool\Migration\Migration as BaseMigration;

/**
 * Class IMGroupMessage
 *
 * @since 2.0
 *
 * @Migration(time=20191005095519)
 */
class IMMessage extends BaseMigration
{
    protected  $tableNum = 16;
    /**
     * @return void
     */
    public function up(): void
    {
        for($i = 0; $i < $this->tableNum; $i++){
            $this->schema->createIfNotExists('IMMessage_'.$i, function (Blueprint $blueprint){
                $blueprint->mediumIncrements('id');
                $blueprint->integer('userId')->unsigned()->comment('用户Id');
                $blueprint->integer('targetId')->unsigned()->comment('对方Id');
                $blueprint->string('conversationType')->comment('会话类型');
                $blueprint->text('content')->nullable()->comment('消息内容');
                $blueprint->string('objectName')->nullable()->comment('消息类型');
                $blueprint->bigInteger('sentTime')->nullable()->comment('发送时间');
                $blueprint->index(['senderUserId', 'targetId', 'conversationType']);
                $blueprint->index(['senderUserId', 'targetId', 'conversationType','objectName']);
            });

        }

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
