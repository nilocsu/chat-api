<?php declare(strict_types=1);


namespace Database\Migration;


use Swoft\Db\Schema\Blueprint;
use Swoft\Devtool\Annotation\Mapping\Migration;
use Swoft\Devtool\Migration\Migration as BaseMigration;

/**
 * Class IMTransmitFile
 *
 * @since 2.0
 *
 * @Migration(time=20191005185522)
 */
class IMTransmitFile extends BaseMigration
{

    /**
     * @return void
     */
    public function up(): void
    {
        $this->schema->createIfNotExists('IMTransmitFile', function (Blueprint $blueprint){
            $blueprint->mediumIncrements('id');
            $blueprint->integer('fromId')->unsigned()->comment('发送用户的Id');
            $blueprint->integer('toId')->unsigned()->comment('接受用户Id');
            $blueprint->string('fileName')->default('')->comment('文件名字');
            $blueprint->integer('size')->unsigned()->comment('文件大小');
            $blueprint->string('taskId')->default('')->comment('任务Id');
            $blueprint->tinyInteger('status')->unsigned()->default(0)->comment('状态');
            $blueprint->timestamps();
        });

    }

    /**
     * @return void
     */
    public function down(): void
    {
        $this->schema->dropIfExists('IMTransmitFile');
    }
}
