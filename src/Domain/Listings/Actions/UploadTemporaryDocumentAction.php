<?php

namespace Domain\Listings\Actions;

use Intervention\Image\Facades\Image;
use Modules\Agency\Entities\Watermark;
use Modules\Listing\Entities\TemporaryDocument;


class UploadTemporaryDocumentAction
{

    public function __invoke($document)
    {
        if (!file_exists(public_path("temporary"))) {
            mkdir(public_path("temporary"));
        }
        if (!file_exists(public_path("temporary/documents"))) {
            mkdir(public_path("temporary/documents"));
        }
        $document_name = str_replace([' ', '_'], '-', $document->getClientOriginalName());
        $main_tmp_folder = auth()->user()->business_id . '-main' . '-' . uniqid() . '-' . now()->timestamp;
        if (!file_exists(public_path('temporary/documents/' . $main_tmp_folder))) {
            mkdir(public_path('temporary/documents/' . $main_tmp_folder));
        }
        $path = public_path('temporary/documents/' . $main_tmp_folder);
        $document->move($path, $document_name);
        $temporary_document = TemporaryDocument::create([
            'folder' => $main_tmp_folder,
            'document' => $document_name,

        ]);
        return $temporary_document;
    }
}