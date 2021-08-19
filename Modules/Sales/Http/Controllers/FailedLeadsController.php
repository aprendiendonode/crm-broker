<?php

namespace Modules\Sales\Http\Controllers;

use App\FaildLead;
use App\Imports\LeadsImport;
use App\Models\SystemTemplate;
use Gate;

use App\Models\Team;
use App\Models\User;
use App\Models\Agency;
use App\Jobs\SendEmail;
use App\Mail\EmailGeneral;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Str;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Events\LeadTaskEvent;
use App\Models\PermissionGroup;
use Illuminate\Validation\Rule;
use App\Events\OpportunityEvent;
use Modules\Sales\Entities\Call;
use Modules\Sales\Entities\Lead;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Activity\Entities\Task;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Sales\Entities\LeadType;
use Modules\Sales\Entities\CallStatus;
use Modules\Sales\Entities\LeadSource;
use Modules\Setting\Entities\Template;
use Modules\Activity\Entities\TaskNote;
use Modules\Activity\Entities\TaskType;
use Modules\Sales\Entities\Opportunity;
use Modules\Sales\Entities\LeadPriority;
use Modules\Sales\Entities\LeadProperty;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Modules\Activity\Entities\TaskStatus;
use App\Notifications\LeadTaskNotification;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Notification;
use Modules\Sales\Entities\OpportunityStage;
use Modules\Sales\Entities\LeadCommunication;
use Modules\Sales\Entities\OpportunityResult;
use App\Notifications\OpportunityNotification;
use Modules\Sales\Entities\LeadQualifications;
use Symfony\Component\HttpFoundation\Response;


class FailedLeadsController extends Controller
{


    public function index($agency)
    {


        abort_if(Gate::denies('view_lead'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pagination = true;

        $per_page = 15;

        $failed_leads = FaildLead::where('agency_id', $agency);


        if (request('filter_reference') != null) {
            $failed_leads->where('reference', request('filter_reference'));
        }

        $failed_leads = $failed_leads->paginate($per_page);


        return view(
            'sales::failed_leads.index',
            compact('failed_leads', 'agency', 'pagination')
        );
    }
}