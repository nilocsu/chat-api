<?php declare(strict_types=1);


namespace Database\Migration;


use Swoft\Db\Schema\Blueprint;
use Swoft\Devtool\Annotation\Mapping\Migration;
use Swoft\Devtool\Migration\Migration as BaseMigration;

/**
 * Class IMAudio
 *
 * @since 2.0
 *
 * @Migration(time=20191005091846)
 */
class IMAudio extends BaseMigration
{

    /**
     * @return void
     */
    public function up(): void
    {
        $this->schema->createIfNotExists('IMAudio', function (Blueprint $blueprint){
            $blueprint->mediumIncrements('id');
            $blueprint->integer('fromId')->unsigned()->comment('发送者Id');
            $blueprint->integer('toId')->unsigned()->comment('接受者Id');
            $blueprint->integer('size')->default(0)->comment('文件大小');
            $blueprint->integer('duration')->default(0)->comment('语音时长');
            $blueprint->timestamps();
        });

    }

    /**
     * @return void
     */
    public function down(): void
    {
        $this->schema->dropIfExists('IMAudio');
    }
}
