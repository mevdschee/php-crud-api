def php_crud_api_transform(tables):

    def get_objects(tables, table_name, where_index=None, match_value=None):
        objects = []
        for record in tables[table_name]['records']:
            if where_index == None or (record[where_index] == match_value):
                object = {}
                columns = tables[table_name]['columns']
                for column in columns:
                    index = columns.index(column)
                    object[column] = record[index]
                    for relation, reltable in tables.items():
                        for key, target in reltable.get('relations', {}).items():
                            if target == table_name + '.' + column:
                                relcols = reltable['columns']
                                column_indices = {value: relcols.index(value) for value in relcols}
                                object[relation] = get_objects(
                                    tables, relation, column_indices[key], record[index])
                objects.append(object)
        return objects

    tree = {}
    for name, table in tables.items():
        if not 'relations' in table:
            tree[name] = get_objects(tables, name)
            if 'results' in table:
                tree['_results'] = table['results']
    return tree


if __name__ == "__main__":
    input = {"posts": {"columns": ["id","user_id","category_id","content"],"records": [[1,1,1,"blogstarted"]]},"post_tags": {"relations": {"post_id": "posts.id"},"columns": ["id","post_id","tag_id"],"records": [[1,1,1],[2,1,2]]},"categories": {"relations": {"id": "posts.category_id"},"columns": ["id","name"],"records": [[1,"anouncement"]]},"tags": {"relations": {"id": "post_tags.tag_id"},"columns": ["id","name"],"records": [[1,"funny"],[2,"important"]]},"comments": {"relations": {"post_id": "posts.id"},"columns": ["id","post_id","message"],"records": [[1,1,"great"],[2,1,"fantastic"]]}}
    output = {"posts": [{"id": 1,"post_tags": [{"id": 1,"post_id": 1,"tag_id": 1,"tags": [{"id": 1,"name": "funny"}]},{"id": 2,"post_id": 1,"tag_id": 2,"tags": [{"id": 2,"name": "important"}]}],"comments": [{"id": 1,"post_id": 1,"message": "great"},{"id": 2,"post_id": 1,"message": "fantastic"}],"user_id": 1,"category_id": 1,"categories": [{"id": 1,"name": "anouncement"}],"content": "blogstarted"}]}

    print(php_crud_api_transform(input)  == output)
