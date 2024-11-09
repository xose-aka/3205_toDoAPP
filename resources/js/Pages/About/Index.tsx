// resources/js/Pages/Index.tsx
import React from 'react';
import { Inertia } from '@inertiajs/inertia';
import AppLayout from "../../Layouts/AppLayout";



interface Props {
    availableLanguages: any[];
    currentLocale: string;
}

const Index: React.FC<Props> = ({  availableLanguages, currentLocale }) => {
    return (
        <AppLayout availableLanguages={availableLanguages} currentLocale={currentLocale}>
            <div>
                <h1 className="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl ">
                    About</h1>
                <hr className="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700"/>
                <p>
                    Kodirov Khusniddin  - Software Developer
                </p>

            </div>
        </AppLayout>
    );
};

export default Index;
