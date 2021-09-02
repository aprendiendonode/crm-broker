<?php

namespace Domain\Listings\Actions;


class RemoveListingTemporaryUploadAction
{

    private $removeListingTempraryPhotoAction;
    private $removeListingTempraryPlanAction;
    private $removeListingTempraryDocumentAction;

    public function __construct(
        RemoveListingTemporaryPhotoAction $removeListingTempraryPhotoAction,
        RemoveListingTemporaryPlanAction $removeListingTempraryPlanAction,
        RemoveListingTemporaryDocumentAction $removeListingTempraryDocumentAction
    ) {
        $this->removeListingTempraryPhotoAction = $removeListingTempraryPhotoAction;
        $this->removeListingTempraryPlanAction = $removeListingTempraryPlanAction;
        $this->removeListingTempraryDocumentAction = $removeListingTempraryDocumentAction;
    }

    public function __invoke($type, $id)
    {
        if ($type == 'photo') {
            ($this->removeListingTempraryPhotoAction)($id);
        }
        if ($type == 'plan') {
            ($this->removeListingTempraryPlanAction)($id);
        }
        if ($type == 'document') {
            ($this->removeListingTempraryDocumentAction)($id);
        }
    }
}