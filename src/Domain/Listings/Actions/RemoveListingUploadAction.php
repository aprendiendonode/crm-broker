<?php

namespace Domain\Listings\Actions;


class RemoveListingUploadAction
{

    private $removeListingPhotoAction;
    private $removeListingPlanAction;
    private $removeListingDocumentAction;

    public function __construct(
        RemoveListingTemporaryPhotoAction $removeListingPhotoAction,
        RemoveListingTemporaryPlanAction $removeListingPlanAction,
        RemoveListingTemporaryDocumentAction $removeListingDocumentAction
    ) {
        $this->removeListingPhotoAction = $removeListingPhotoAction;
        $this->removeListingPlanAction = $removeListingPlanAction;
        $this->removeListingDocumentAction = $removeListingDocumentAction;
    }

    public function __invoke($type, $id)
    {
        if ($type == 'photo') {
            ($this->removeListingPhotoAction)($id);
        }
        if ($type == 'plan') {
            ($this->removeListingPlanAction)($id);
        }
        if ($type == 'document') {
            ($this->removeListingDocumentAction)($id);
        }
    }
}