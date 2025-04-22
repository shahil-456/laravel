import re

# # Read the HTML file
# with open('home.blade.php', 'r', encoding='utf-8') as file:
#     content = file.read()

# content = re.sub(
#     r'(<link\s+[^>]*href=["\'])(assets/[^"\']*)(["\'][^>]*>)',
#     r'\1{{ asset("knorix/\2") }}\3',
#     content
# )

# # Write the modified content back to the file
# with open('home.blade.php', 'w', encoding='utf-8') as file:
#     file.write(content)



# Read the HTML file
with open('home.blade.php', 'r', encoding='utf-8') as file:
    content = file.read()

# Use regex to find and replace <img> tags with src containing 'assets/'
# This regex captures the entire <img> tag and modifies the src attribute
content = re.sub(
    r'(<img\s+[^>]*src=["\'])(assets/[^"\']*)(["\'][^>]*>)',
    r'\1{{ asset("knorix/\2") }}\3',
    content
)

# Write the modified content back to the file
with open('home.blade.php', 'w', encoding='utf-8') as file:
    file.write(content)


