/* usuarios */
Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
/* room_types */
Schema::create('room_types', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->timestamps();
        });
/* rooms */
 Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_type_id');
            $table->foreign('room_type_id')->references('id')->on('room_types')->onDelete('restrict')->nullable();
            $table->string('name')->nullable();
            $table->string('image', 2048)->nullable();
            $table->timestamps();
        });
/* room_users */
Schema::create('room_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('room_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('restrict');
            $table->boolean('isAdmin')->default(false)->comment('Indica si el usuario en cuestión tiene poderes de administrador de la sala');
            $table->boolean('isCreator')->default(false)->comment('Indica si el usuario en cuestión es el creador de la sala');
        
            $table->timestamps();
        });
/* media_types */
Schema::create('media_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
/* message_media */
Schema::create('message_media', function (Blueprint $table) {
            $table->id();
            $table->string('url', 2048)->nullable();
            
            $table->unsignedBigInteger('media_type_id');
            $table->foreign('media_type_id')->references('id')->on('media_types')->onDelete('restrict');
            $table->string('client_name');
            $table->timestamps();
        });

/* message1s */
 Schema::create('message1s', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('message_media_id');            
            $table->unsignedBigInteger('user_id');            
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('answer_for_id')->nullable(); // Agrega la columna para la relación reflexiva

            
            $table->foreign('message_media_id')->references('id')->on('message_media')->onDelete('restrict')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('restrict');
            $table->foreign('answer_for_id')->references('id')->on('message1s')->onDelete('restrict')->nullable();


            $table->longtext('content')->nullable();
            $table->timestamps();
        });
/* message_unread_user */
Schema::create('message_unread_user', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('message_id');            
            $table->unsignedBigInteger('user_id');            
            $table->unsignedBigInteger('room_id');
            $table->foreign('message_id')->references('id')->on('message1s')->onDelete('restrict')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('restrict');
            $table->timestamps();
        });