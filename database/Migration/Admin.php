<?php declare(strict_types=1);


namespace Database\Migration;


use Swoft\Db\Schema\Blueprint;
use Swoft\Devtool\Annotation\Mapping\Migration;
use Swoft\Devtool\Migration\Migration as BaseMigration;

/**
 * Class Admin
 *
 * @since 2.0
 *
 * @Migration(time=20191005085359)
 */
class Admin extends BaseMigration
{
    /**
     * @return void
     */
    public function up(): void
    {
        $this->schema->createIfNotExists('admin', function (Blueprint $blueprint){
            $blueprint->mediumIncrements('id');
            $blueprint->string('name', 50);
            $blueprint->string('pwd')->comment('密码');
            $blueprint->string('avatar')->comment('头像')->default('');
            $blueprint->string('signature')->default('')->comment('个性签名');
            $blueprint->string('email')->default(null)->comment('邮箱');
            $blueprint->tinyInteger('status', false, true, 1)->default(1)->comment('用户状态 0 :正常 1:删除 可扩展');
            $blueprint->timestamps();
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
