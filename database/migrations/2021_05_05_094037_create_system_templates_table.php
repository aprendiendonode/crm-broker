<?php

use App\Models\SystemTemplate;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_templates', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->enum('type', ['description', 'email'])->default('description')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_ar')->nullable();
            $table->string('slug')->nullable();

            $table->timestamps();
        });


        SystemTemplate::create([
            'title' => 'Opportunity Assign',
            'type' => 'email',
            'description_en' => '<p>Hi there,</p><p>A new opportunity <strong>{OPPORTUNITY_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this opportunity by logging in to the portal using the link below.</p><p><br><a href="{OPPORTUNITY_URL}"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>',
            'description_ar' => '<p>Hi there,</p><p>A new task <strong>{TASK_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this task by logging in to the portal using the link below.</p><p><br><a href="{TASK_URL}"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>',
            'slug' => 'opportunity_assign'
        ]);


        SystemTemplate::create([
            'title' => 'Lead Task',
            'type' => 'email',
            'description_en' => '<p>Hi there,</p><p>A new Task <strong>{TASK_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this Lead by logging in to the portal using the link below.</p><p><br><a href="{TASK_URL}"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>',
            'description_ar' => '<p>Hi there,</p><p>A new Task <strong>{TASK_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this Lead by logging in to the portal using the link below.</p><p><br><a href="{TASK_URL}"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>',
            'slug' => 'lead_task'
        ]);

        SystemTemplate::create([
            'title' => 'Client Task',
            'type' => 'email',
            'description_en' => '<p>Hi there,</p><p>A new Task <strong>{TASK_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this Lead by logging in to the portal using the link below.</p><p><br><a href="{TASK_URL}"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>',
            'description_ar' => '<p>Hi there,</p><p>A new Task <strong>{TASK_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this Lead by logging in to the portal using the link below.</p><p><br><a href="{TASK_URL}"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>',
            'slug' => 'client_task'
        ]);

        SystemTemplate::create([
            'title' => 'Opportunity Task',
            'type' => 'email',
            'description_en' => '<p>Hi there,</p><p>A new Task <strong>{TASK_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this opportunity by logging in to the portal using the link below.</p><p><br><a href="{TASK_URL}"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>',
            'description_ar' => '<p>Hi there,</p><p>A new Task <strong>{TASK_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this opportunity by logging in to the portal using the link below.</p><p><br><a href="{TASK_URL}"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>',
            'slug' => 'opportunity_task'
        ]);

        SystemTemplate::create([
            'title' => 'Opportunity Result',
            'type' => 'email',
            'description_en' => '<p>Hi there,</p><p>Opportunity Result Report OF: <strong>{OPPORTUNITY_NAME}</strong> &nbsp;has been updated by <strong>{UPDATED_BY}</strong>.</p><p>The New Update : </p> <p>Status : {STATUS} .</p> <p> Stage : {STAGE}.</p><p>Note :  {NOTE} </p><p>You can view this opportunity by logging in to the portal using the link below.</p><p><br><a href="{OPPORTUNITY_URL}"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>',
            'description_ar' => '<p>Hi there,</p><p>Opportunity Result Report OF: <strong>{OPPORTUNITY_NAME}</strong> &nbsp;has been updated by <strong>{UPDATED_BY}</strong>.</p><p>The New Update : </p> <p>Status : {STATUS} .</p> <p> Stage : {STAGE}.</p><p>Note :  {NOTE} </p><p>You can view this opportunity by logging in to the portal using the link below.</p><p><br><a href="{OPPORTUNITY_URL}"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>',
            'slug' => 'opportunity_result'
        ]);

        SystemTemplate::create([
            'title' => 'Opportunity َQuestion',
            'type' => 'email',
            'description_en' => '<p>Hi there,</p><p>A new Question Has Been Made By Management : {MADE_BY}.</p><p>Question Is : {QUESTION} .</p><p>Opportunity Name Is : {OPPORTUNITY_NAME} .</p><p>You can view this opportunity by logging in to the portal using the link below.</p><p><br><a href="{OPPORTUNITY_URL}"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>',
            'description_ar' => '<p>Hi there,</p><p>A new Question Has Been Made By Management : {MADE_BY}.</p><p>Question Is : {QUESTION} .</p><p>Opportunity Name Is : {OPPORTUNITY_NAME} .</p><p>You can view this opportunity by logging in to the portal using the link below.</p><p><br><a href="{OPPORTUNITY_URL}"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>',
            'slug' => 'opportunity_question'
        ]);

        SystemTemplate::create([
            'title' => 'Client َQuestion',
            'type' => 'email',
            'description_en' => '<p>Hi there,</p><p>A new Question Has Been Made By Management : {MADE_BY}.</p><p>Question Is : {QUESTION} .</p><p>Opportunity Name Is : {OPPORTUNITY_NAME} .</p><p>You can view this opportunity by logging in to the portal using the link below.</p><p><br><a href="{OPPORTUNITY_URL}"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>',
            'description_ar' => '<p>Hi there,</p><p>A new Question Has Been Made By Management : {MADE_BY}.</p><p>Question Is : {QUESTION} .</p><p>Opportunity Name Is : {OPPORTUNITY_NAME} .</p><p>You can view this opportunity by logging in to the portal using the link below.</p><p><br><a href="{OPPORTUNITY_URL}"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>',
            'slug' => 'client_question'
        ]);

        SystemTemplate::create([
            'title' => 'Opportunity َAnswer',
            'type' => 'email',
            'description_en' => '<p>Hi there,</p><p> Answer Has Been Made By : {ANSWERED_BY} To. </p><p>Question : {QUESTION} .</p><p>Answer Is : {Answer} .</p><p>Opportunity Name : {OPPORTUNITY_NAME} .</p><p>You can view this Answer by logging in to the portal using the link below.</p><p><br><a href="{OPPORTUNITY_URL}"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>',
            'description_ar' => '<p>Hi there,</p><p> Answer Has Been Made By : {ANSWERED_BY} To. </p><p>Question : {QUESTION} .</p><p>Answer Is : {Answer} .</p><p>Opportunity Name : {OPPORTUNITY_NAME} .</p><p>You can view this Answer by logging in to the portal using the link below.</p><p><br><a href="{OPPORTUNITY_URL}"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>',
            'slug' => 'opportunity_answer'
        ]);

        SystemTemplate::create([
            'title' => 'Client َAnswer',
            'type' => 'email',
            'description_en' => '<p>Hi there,</p><p> Answer Has Been Made By : {ANSWERED_BY} To. </p><p>Question : {QUESTION} .</p><p>Answer Is : {Answer} .</p><p>Opportunity Name : {OPPORTUNITY_NAME} .</p><p>You can view this Answer by logging in to the portal using the link below.</p><p><br><a href="{OPPORTUNITY_URL}"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>',
            'description_ar' => '<p>Hi there,</p><p> Answer Has Been Made By : {ANSWERED_BY} To. </p><p>Question : {QUESTION} .</p><p>Answer Is : {Answer} .</p><p>Opportunity Name : {OPPORTUNITY_NAME} .</p><p>You can view this Answer by logging in to the portal using the link below.</p><p><br><a href="{OPPORTUNITY_URL}"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>',
            'slug' => 'client_answer'
        ]);
        SystemTemplate::create([
            'title' => 'Share Request',
            'type' => 'email',
            'description_en' => '<p> This {AGENCY} Request to share listing with you?</p><a href="{ACTION_URL}">Accept</a><a href="{REFUSE_URL}">Refuse</a><a href="{BLOCK_URL}">block</a>',
            'description_ar' => '<p> This {AGENCY} Request to share listing with you?</p><a href="{ACTION_URL}">Accept</a><a href="{REFUSE_URL}">Refuse</a><a href="{BLOCK_URL}">block</a>',
            'slug' => 'share_request'
        ]);
        SystemTemplate::create([
            'title' => 'Listing Task',
            'type' => 'email',
            'description_en' => '<p>Hi there,</p><p>A new Task <strong>{TASK_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this listing by logging in to the portal using the link below.</p><p><br><a href="{TASK_URL}"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>',
            'description_ar' => '<p>Hi there,</p><p>A new Task <strong>{TASK_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this listing by logging in to the portal using the link below.</p><p><br><a href="{TASK_URL}"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>',
            'slug' => 'listing_task'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_templates');
    }
}