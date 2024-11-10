// resources/js/Pages/Index.tsx
import React, {useEffect, useRef, useState} from 'react';
import { Inertia } from '@inertiajs/inertia';
import AppLayout from "../../Layouts/AppLayout";
import axios from "axios";

interface Todo {
    id: number;
    title: string;
    description: string;
    isCompleted: boolean;
    createdAt: string;
    updatedAt: string;
}

interface Props {
    todos: Todo[];
    availableLanguages: any[];
    currentLocale: string;
    aboutIndexUrl: string;
    translations: any;
}

const Index: React.FC<Props> = (
    { availableLanguages, currentLocale, aboutIndexUrl, translations  }
) => {

    const [todos, setTodos] = useState<Todo[]>([]);
    const [loading, setLoading] = useState(false);
    const [cancelToken, setCancelToken] = useState(null);

    const fetchTodos = async () => {
        // Cancel the previous request if it's still pending
        if (cancelToken) {
            cancelToken.cancel("Previous request canceled due to new request.");
        }

        // Create a new CancelToken for the current request
        const source  = axios.CancelToken.source();
        setCancelToken(source)

        try {
            setLoading(true);
            const response = await axios.get('/todos-list', {
                cancelToken: source.token,
            });

            setTodos(response.data);
        } catch (error) {
            if (axios.isCancel(error)) {
                console.log("Request canceled:", error.message);
            } else {
                console.error("Error fetching todos:", error);
            }
        } finally {
            setLoading(false);
        }
    };

    useEffect(() => {
        fetchTodos()
    }, []);

    return (
        <AppLayout
            availableLanguages={availableLanguages}
            currentLocale={currentLocale}
            aboutIndexUrl={aboutIndexUrl}
            translations={translations}
        >
            <div>
                <h1 className="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl ">
                    { translations.todo_list }
                </h1>
                <button
                    onClick={fetchTodos}
                    className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Refresh to do list
                </button>
                <hr className="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700"/>
                <div className="grid grid-cols-3 gap-4">

                    {
                        loading ? (
                        <p>Loading...</p>
                    ) : (
                            todos.map(todo => (

                                <div key={todo.id} className="max-w-sm rounded overflow-hidden shadow-lg">
                                    <div className="px-6 py-4">
                                        <div className="font-bold text-xl mb-2">
                                            {todo.title}
                                        </div>
                                        <p className="text-gray-700 text-base">
                                            {todo.description}
                                        </p>
                                    </div>
                                    <div className="px-6 pt-4 pb-2">
                                <span
                                    className="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                    Created at: { todo.createdAt }
                                </span>
                                        <span
                                            className="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                        Updated at: { todo.updatedAt }
                                    </span>

                                    </div>
                                </div>

                                // <div
                                //     className="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                                //     <h5 className="mb-2 text-3xl font-bold text-gray-900 dark:text-white">
                                //         {todo.title}
                                //     </h5>
                                //     <p className="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">
                                //         {todo.description}
                                //     </p>
                                // </div>

                            ))

                    )}
                </div>
            </div>
        </AppLayout>
    );
};

export default Index;
