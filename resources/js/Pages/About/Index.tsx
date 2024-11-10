// resources/js/Pages/Index.tsx
import React from 'react';
import { Inertia } from '@inertiajs/inertia';
import AppLayout from "../../Layouts/AppLayout";



interface Props {
    availableLanguages: any[];
    currentLocale: string;
    aboutIndexUrl: string;
    translations: any;
}

const Index: React.FC<Props> = (
    {  availableLanguages, currentLocale, aboutIndexUrl, translations }
) => {
    return (
        <AppLayout
            availableLanguages={availableLanguages}
            currentLocale={currentLocale}
            aboutIndexUrl={aboutIndexUrl}
            translations={translations}
        >
            <div>
                <h1 className="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl ">
                    { translations.about }</h1>
                <hr className="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700"/>
                <p>
                    Kodirov Khusniddin  - { translations.software_engineer }
                </p>

            </div>
        </AppLayout>
    );
};

export default Index;
