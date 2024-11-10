import React from 'react';
import { InertiaLink } from '@inertiajs/inertia-react';
import LanguageSwitcher from "../components/LanguageSwitcher";

interface AppLayoutProps {
    children: React.ReactNode;
    availableLanguages: any[];
    currentLocale: string;
    aboutIndexUrl: string;
    translations: any;
}

const AppLayout: React.FC<AppLayoutProps> = (
    {
        children, availableLanguages, currentLocale, aboutIndexUrl, translations
    }
) => {
    return (
        <div className="min-h-screen flex flex-col">
            {/* Navbar */}
            <nav className="bg-blue-600 text-white p-4">
                <InertiaLink href="/" className="mr-4">{ translations.home }</InertiaLink>
                <InertiaLink href="/readme" className="mr-4">README.md</InertiaLink>
                <InertiaLink href={aboutIndexUrl}>{ translations.about }</InertiaLink>
                <LanguageSwitcher
                    availableLanguages={availableLanguages}
                    currentLocale={currentLocale}
                />
            </nav>

            {/* Main content */}
            <main className="flex-1 p-4">
                {children}
            </main>

            {/* Footer */}
            <footer className="bg-gray-800 text-white p-4 text-center">
            </footer>
        </div>
    );
};

export default AppLayout;
