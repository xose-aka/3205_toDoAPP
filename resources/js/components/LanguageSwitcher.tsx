import React from 'react';
import { Inertia } from '@inertiajs/inertia';

const LanguageSwitcher = ({ availableLanguages, currentLocale }) => {

    console.log(currentLocale);
    const handleLanguageChange = (e) => {
        const selectedLocale = e.target.value;
        console.log(selectedLocale);
        if (selectedLocale !== currentLocale) {
            Inertia.get(`/change-language/${selectedLocale}`);
        }
    };

    return (
        <span className="language-switcher float-end">
            <label htmlFor="language-select" className="mr-2 text-gray-700"></label>
            <select
                id="language-select"
                value={currentLocale}
                onChange={handleLanguageChange}
                className="p-2 border border-gray-300 rounded-md bg-white text-gray-900"
            >
                {availableLanguages.map((lang) => (
                    <option key={lang.code} value={lang.code} >
                        {lang.code}
                    </option>
                ))}
            </select>
        </span>
    );
};

export default LanguageSwitcher;
