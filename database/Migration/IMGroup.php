<?php declare(strict_types=1);


namespace Database\Migration;


use Swoft\Db\Schema\Blueprint;
use Swoft\Devtool\Annotation\Mapping\Migration;
use Swoft\Devtool\Migration\Migration as BaseMigration;

/**
 * Class IMGroup
 *
 * @since 2.0
 *
 * @Migration(time=20191005092948)
 */
class IMGroup extends BaseMigration
{

    /**
     * @return void
     */
    public function up(): void
    {
        $this->schema->createIfNotExists('admin', function (Blueprint $blueprint){
            $blueprint->increments('id');
            $blueprint->integer('fromId')->unsigned()->comment('发送者Id');
            $blueprint->integer('toId')->unsigned()->comment('接受者Id');
            $blueprint->integer('size')->default(0)->comment('文件大小');
            $blueprint->integer('duration')->default(0)->comment('语音时长');
            $blueprint->timestamps();
            $blueprint->index(['fromId', 'toId']);
        });

    }

    /**
     * @return void
     */
    public function down(): void
    {
        $this->schema->dropIfExists('admin');
    }
}
